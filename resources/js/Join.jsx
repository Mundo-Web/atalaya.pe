import { useEffect, useState } from "react";

import { createRoot } from "react-dom/client";
import CreateReactScript from "./Utils/CreateReactScript";
import JoinContainer from "./Reutilizables/Join/JoinContainer";
import { GET, Session } from "sode-extend-react";

// Step Views
import AccountStep from "./Reutilizables/Join/AccountStep";
import BusinessStep from "./Reutilizables/Join/BusinessStep";
import UsageStep from "./Reutilizables/Join/UsageStep";
import SurveyStep from "./Reutilizables/Join/SurveyStep";
import InviteTeamStep from "./Reutilizables/Join/InviteTeamStep";
import DashboardStep from "./Reutilizables/Join/DashboardStep";
import ColumnsStep from "./Reutilizables/Join/ColumnsStep";
import ManageStep from "./Reutilizables/Join/ManageStep";
import StatusesStep from "./Reutilizables/Join/StatusesStep";
import JoinThanks from "./Reutilizables/Join/JoinThanks";
import JSEncrypt from "jsencrypt";
import LoginStep from "./Reutilizables/Join/LoginStep";

const Join = ({ PUBLIC_RSA_KEY, prefixes, correlative, services, service: serviceLoaded, authView }) => {
    const jsEncrypt = new JSEncrypt()
    jsEncrypt.setPublicKey(PUBLIC_RSA_KEY)

    const [service, setService] = useState(serviceLoaded)
    const [step, setStep] = useState(authView);
    const [data, setData] = useState(Session.get('join-data') ?? { documentType: 'DNI', phonePrefix: '51' })

    const getStepView = () => {
        switch (step) {
            case 'login':
                return <LoginStep setStep={setStep} jsEncrypt={jsEncrypt} services={services} correlative={correlative} setService={setService} />
            case 'account':
                return <AccountStep data={data} setData={setData} setStep={setStep} jsEncrypt={jsEncrypt} setService={setService} />
            case 'business':
                return <BusinessStep data={data} setData={setData} setStep={setStep} jsEncrypt={jsEncrypt} prefixes={prefixes} />
            case 'usage':
                return <UsageStep data={data} setData={setData} setStep={setStep} />
            case 'survey':
                return <SurveyStep data={data} setData={setData} setStep={setStep} />
            case 'invite-team':
                return <InviteTeamStep data={data} setData={setData} setStep={setStep} />
            case 'dashboard':
                return <DashboardStep data={data} setData={setData} setStep={setStep} />
            case 'columns':
                return <ColumnsStep data={data} setData={setData} setStep={setStep} />
            case 'manage':
                return <ManageStep data={data} setData={setData} setStep={setStep} />
            case 'statuses':
                return <StatusesStep data={data} setData={setData} setStep={setStep} />
            case 'thanks':
                return <JoinThanks data={data} setData={setData} setStep={setStep} />
            default:
                return <AccountStep data={data} setData={setData} setStep={setStep} jsEncrypt={jsEncrypt} />
        }
    }

    useEffect(() => {
        Session.set('join-data', data)
    }, [data])

    useEffect(() => {
        const pathname = window.location.pathname;
        const serviceCorrelative = service?.correlative;
        if (service) {
            if (pathname !== `/join/${serviceCorrelative}`) {
                history.pushState({}, '', `/join/${serviceCorrelative}`);
            }
            const isValidService = services.some(s => s.correlative === serviceCorrelative);
            setStep(isValidService ? 'account' : 'login');
        } else {
            if (pathname !== '/join') {
                history.pushState({}, '', '/join');
            }
            setStep('login');
        }
    }, [service])

    useEffect(() => {
        const handlePop = () => {
            const pathname = window.location.pathname

            const correlativeFound = pathname.match(/\/join\/(.+)/);
            const serviceFound = services.find(s => s.correlative === correlativeFound?.[1]);

            if (pathname != '/join' && serviceFound) {
                setService(serviceFound);
            } else {
                setService(null)
            }
        }


        const handleChange = () => {
            const pathname = window.location.pathname;
            if (pathname == '/join') {
                setService(null)
            } else {
                const correlativeMatch = pathname.match(/\/join\/(.+)/);
                if (correlativeMatch) {
                    const foundService = services.find(s => s.correlative === correlativeMatch[1]);
                    if (foundService) {
                        setService(foundService);
                    }
                }
            }
        };

        window.addEventListener('popstate', handlePop);
        window.addEventListener('locationchange', handleChange);

        return () => {
            window.removeEventListener('popstate', handlePop);
            window.removeEventListener('locationchange', handleChange);
        };
    }, []);

    useEffect(() => {
        if (service) document.title = `Join ${service.name} | Atalaya`
        else document.title = 'Join | Atalaya'
    }, [null])

    return <JoinContainer step={step} setStep={setStep}>
        {getStepView()}
    </JoinContainer>
}

CreateReactScript((el, properties) => {
    createRoot(el).render(
        //<Router location={location}>
        <Join {...properties} />
        //</Router>
    );
})