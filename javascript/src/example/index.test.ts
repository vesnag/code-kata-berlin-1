import MyClass from './index';

test('Test should run', () => {
  const obj = new MyClass();
  expect(obj.name).toBe('MyClass');
});
