CompSci Kata Kata
-----------------

Equal Distribution
------------------

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

Then scientists should be organized into groups:

```
Barabara Liskov, Kurt Gödel: Room1
Donald Knuth, Magaret Hamilton: Room2
```

Room Overflow
-------------

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

Loneliness
----------

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

Hosts can help
--------------

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

Then scientists should be organized into groups:

```
Barabara Liskov, Kurt Gödel: Room1
Richard Stallman, Ada Lovelace: Room2
```

Change Places!!!
----------------

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
