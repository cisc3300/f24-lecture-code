// Functions

// Function Declaration
function isEven(num) {
  return num % 2 === 0;
}

// Function Expression
const consoleAdd = function (a, b) {
  console.log(a + b);
}

// arrow functions (do not make a binding to the this keyword, maybe don't use as methods in objects)
let add = (a, b) => a + b;
// let add = function (a, b) {
//   return a + b;
// }

add(1,3)

//Function types

//First-class functions if functions in that language are treated like other variables
const subtract = function(a, b) {
  return a - b
}

//higher-order function: A function that returns a function or takes other functions as arguments.
function addSubtract(add, subtract, a, b) {
  // A callback is a function passed as an argument to another function in this example, add and subtract, they are called later
  const added = add(a, b)
  const subtracted = subtract(a, b)
  return [added, subtracted]
}
console.log(addSubtract(add, subtract, 1, 2))


function doSomething(callback) {
  callback()
}

//An anonymous function is a function without a name
doSomething(() => console.log('hey'))


//OBJECTS

//creating objects

//object literals
const cat = {
  name: 'pinecone',
  age: 13,
  meow: () => {
    console.log('meow')
  }
}
cat.meow();

//The new keyword and the object constructor creates a blank object.
const dog = new Object();
dog.name = 'daisy'

//Object constructors can use a function as a template for creating objects.
function Fish (name, age) {
  this.name = name
  this.age = age
}

const fish = new Fish('nemo', 8)
console.log(fish)

//new from es6: You can use the keyword class to create a class.
//You must add a method named constructor():
class Car {
  constructor(name, year) {
    this.name = name;
    this.year = year;
  }
}

//Javascript is different from other OOP languages in that using a class to create objects is optional/Syntactic sugar
const chevy = new Car('chevy', 2014)
console.log(chevy)


//accessing, updating, removing properties
const cat = {
  name: 'pinecone',
  meow: function () {
    console.log(this)
  }
}

console.log(cat.name)
console.log(cat['name'])

cat.name = 'peaches'
console.log(cat.name)

delete cat.name
console.log(cat)

//The this keyword, is basic off the current context in which it was invoked
console.log(this)
console.log(cat.meow())

//arrays are objects
const array1 = [1, 2, 3]
array1[3] = 'yo'
console.log(array1)


//global objects/built ins

//built in string
//how this works: property accessor (the dot in this case) temporarily converts the primitive value to an object
const stringVariable = "test"
console.log(stringVariable.toUpperCase());

const numberVariable = 1
console.log(numberVariable.toPrecision(4))

//global object used as a static class
console.log(Math.random())

//global object that can be instantiated to an object
const rightNow = new Date()
console.log(rightNow)