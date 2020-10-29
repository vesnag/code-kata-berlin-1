CompSci Kata Kata
=================

Since time began famous computer scientists have gathered in pairs to perform
20 minute code katas.

Unfortunately, due to plague they cannot meet in person, this caused them much
to think about and they decided to devise a way to perform their katas in the
Etherium! So they invented video conferencing and then the internet. This took
much energy and thought, and, unfortunately, they are BURNT OUT!

They are so close to reaching their goal, but they have no energy to write the
final algorithms which will dictate who will pair with who!

They need your help!

Bootstrap
---------

Bootstrap is provided for PHP and JS but you are free to use whatever language
you like.

For PHP it is assumed you have PHP 7.2+ locally and
[composer](https://getcomposer.org):

```
$ cd php
$ composer install
```

For Javascript an `package.json` is provided with Typescript and Jest.

```
$ cd javascript
$ npm install
```

Pairing
-------

Scientists will be paired with one another.

1. One should "drive" (i.e. write the code).
1. Should navigate (guide the driver).

Scientist Goals
---------------

1. Learn from other scientists.
2. _Try_ and solve the problem with _code_ within the _time constraint_.

Rules
-----

1. After 20 minutes the driver _deletes all the code_, switch places, and
   driver becomes navigator.
2. Automated tests before working code! (or not, whatever).

Specification
-------------

### Equal Distribution

Given the following scientists:

```
Barabara Liskov
Kurt Gödel
Donald Knuth
Magaret Hamilton
```

And the following rooms:

```
Room1
Room2
```

Then scientists should be organized into rooms:

```
Barabara Liskov, Kurt Gödel: Room1
Donald Knuth, Magaret Hamilton: Room2
```

### Room Overflow

Given the following scientists:

```
Barabara Liskov
Kurt Gödel
Richard Stallman
```

And the following rooms:

```
Room1
```

Then an error should be produced:

```
No room for Richard Stallman!
```

### Loneliness

Given the following scientists:

```
Barabara Liskov
Kurt Gödel
Richard Stallman
```

And the following rooms:

```
Room1
Room2
Room3
```

Then an error should be produced:

```
Richard Stallman is lonely and needs help!
```

### Hosts can help

Given the following scientists:

```
Barabara Liskov
Kurt Gödel
Richard Stallman
```

And the following hosts:

```
Ada Lovelace
```

And the following rooms:

```
Room1
Room2
```

Then scientists should be organized into rooms:

```
Barabara Liskov, Kurt Gödel: Room1
Richard Stallman, Ada Lovelace: Room2
```

### Change Places!!!

Given the following scientists:

```
Barabara Liskov
Kurt Gödel
Richard Stallman
Ada Lovelace
```

And the following rooms:

```
Room1
Room2
```

And the following session has already taken place:

```
Barabara Liskov, Kurt Gödel: Room1
Richard Stallman, Ada Lovelace: Room2
```

When a new session takes place

Then scientists should have new partners:

```
Barabara Liskov, Richard Stallman: Room1
Kurt Gödel, Ada Lovelace: Room2
```
