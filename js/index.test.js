/**
 * @file index.test.js
 * Tests for index.js goes here
 */

const {sum} = require('./index');

test('adds 1 + 2 to equal 3', () => {
  expect(sum(1, 2)).toBe(3);
});

test('adds 5 + 6 to equal 11', () => {
  expect(sum(5, 6)).toBe(11);
});

test('adds -5 + 6 to equal 1', () => {
  expect(sum(-5, 6)).toBe(1);
});
