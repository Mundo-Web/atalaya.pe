import BasicRest from "./BasicRest"

class PeopleRest extends BasicRest {
  path = 'person'

  search = (documentType, documentNumber) => this.simpleGet(`/api/${this.path}/search/${documentType}/${documentNumber}`)
}

export default PeopleRest