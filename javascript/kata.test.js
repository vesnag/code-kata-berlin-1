const {kata} = require('./kata');

test('it converts short option to bool', () => {
  expect(kata('-a')).toEqual({a: true});
});
test('it converts many short option to bool', () => {
  expect(kata('-a -b')).toEqual({a: true, b: true});
});
test('it converts many short option together to bool', () => {
  expect(kata('-abc')).toEqual({a: true, b: true, c:true});
});

test('it converts many short option together to bool', () => {
  expect(kata('-abc -def')).toEqual({a: true, b: true, c:true, d:true, e:true, f:true});
});

test('it converts long option to bool', () => {
  expect(kata('--foo')).toEqual({foo:true});
});

test('it converts long option to value', () => {
  expect(kata('--foo=bar')).toEqual({foo:'bar'});
});

test('it validates input andvalue', () => {
  expect(() => kata('foo')).toThrow();
});
