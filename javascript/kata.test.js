const {Container, MyService, DependantService} = require('./kata');

test('It returns object created by factory with ID', ()=>{
  const container = new Container();
  container.register('$MyService', () => new MyService());
  expect(container.get('$MyService')).toEqual(new MyService());
});

test('It returns the same  object created all the time', ()=>{
  const container = new Container();
  container.register('$MyService', () => new MyService());
  expect(container.get('$MyService')).toBe(container.get('$MyService'));
});


test('It throws exception for not registered services', ()=>{
  const container = new Container();
  expect(() => {
    container.get('$MyServiceX');
  }).toThrow();
});

test('It returns service whose constructor depends on another service', ()=>{
  const container = new Container();
  container.register('$MyService', () => new MyService());
  container.register('$DependantService', (registry) => new DependantService(registry.$MyService));
  expect(container.get('$DependantService').MyService).toBe(container.get('$MyService'));
});
