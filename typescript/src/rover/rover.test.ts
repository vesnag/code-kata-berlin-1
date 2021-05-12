import RoverNavigator from './rover';

test('It is initialised', () => {
  const roverNavigator = new RoverNavigator([5, 5], [1, 2, 'N']);
  expect(roverNavigator.getPosition()).toEqual([1, 2, 'N']);
});

test('It should return the final position on command', () => {
  const roverNavigator = new RoverNavigator([5, 5], [1, 2, 'N']);
  expect(roverNavigator.command('LMLMLMLMM')).toEqual([1, 3, 'N']);
});
