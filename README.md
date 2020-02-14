# Code Kata Berlin 1

Code Kata Bootstrap repository:

## Getting Started

### JavaScript

Start your project in the `javascript` directory:

```
$ cd javascript
$ npm install
```

### Quick start with a new kata

run following

```
$ npm run kata:new <kataName>
```

`kataName` argument needs to be the name of the kata.

It will create a new directory  
`/javascript/src/<kataName>`

with files

```
|-src
  |- <kataName>
    |- index.ts
    |- index.test.ts
```

which contains basic barebone to get you up and running and runs jest watch on that directory for you.

You are all set to start coding.

#### Run the tests:

```
$ npm test
```

Run the tests and watch file changes:

```
$ npm test-watch
```

#### Run the tests using VSCode extension

Or install Jest for VSCode
https://marketplace.visualstudio.com/items?itemName=Orta.vscode-jest

### PHP

```
$ cd php
$ composer install
```

Create your test class:

```
$ ./vendor/bin/phpspec describe <your first class name>
```

Run the specs:

```
$ ./vendor/bin/phpspec run
```

## Remember to DELETE YOUR CODE!

```
$ git reset --hard
$ git clean -f
```

## Special Challenges

## Meetup finder

Checkout the `meetup-finder` branch.
