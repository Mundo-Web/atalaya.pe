import BasicRest from "../BasicRest";

class BusinessesRest extends BasicRest {
    path = 'root/businesses'

    byUser = (userId) => this.simpleGet(`/api/${this.path}/by-user/${userId}`)
}

export default BusinessesRest