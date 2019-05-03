class Container {
  constructor() {
    this.registry = {};
  }

  register (id, service){
    this.registry[id] = service(this.registry);
  }

  get(id) {
    if (Object.keys(this.registry).indexOf(id) < 0)
      throw new Error();
    return this.registry[id];
  }
}

class MyService {

}

class DependantService {
  constructor(MyService) {
    this.MyService = MyService;
  }
}

module.exports = {Container, MyService, DependantService};
