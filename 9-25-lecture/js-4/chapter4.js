//conditional statements

//1 == 2 is an expression, equates to a true or false
console.log(1 == 2)
console.log(1 == '1')

//parenthesis enclose/encapsulate expressions
// || is or - will pass if either is true
console.log((1 > 2) || (2 < 3))

//&& is and = if both are true
console.log(true && false)

//we can chain them together to make more complex expressions
console.log((true || false) && (true && true) || (true))

//conditional statements, if true do first block, etc
if (1 > 2) {
  console.log('true')
} else if (1 < 4) {
  console.log("if second condition is true")
} else {
  console.log('else run this')
}

//switch
switch('pinecone') {
  case 'cat1':
    // code block
    break;
  case 'pinecone':
    console.log('found')
    break;
  default:
    console.log('default')
  // code block
}

//ternary
const ternaryValue = 1 > 2 ? 'true' : 'false';
console.log(ternaryValue)

//type coercion
//compare values irrespective of their type with ==
if(false == 0) {
  console.log("true")
}

//or include a type check with ===
if(false === 0) {
  console.log("true")
}


//truthy falsy gotchas
if({}) {
  console.log("empty object = true!")
}
const emptyArray = []

if ('0') {
  console.log('true')
} else {
  console.log('false')
}

//short circuit

const firstValue = 'first value'
const shortCircuit = (firstValue || nothing)

console.log(shortCircuit)


//loops
const cats = ['cat1', 'cat2', 'cat3'];
const consoleCats = function (cat) {
  console.log();
}

//for loops
for (let i = 0; i < cats.length; i++) {
  console.log(cats[i]);
}


//forEach, takes a callback function and passes the current element to it
cats.forEach(function(currentElement) {
  console.log(currentElement)
});

//for of
for (const cat of cats) {
  console.log(cat);
}

//for in - iterates object properties
const catObject = {
  name: 'Pinecone',
  type: 'munchkin'
}

for(const property in catObject) {
  console.log(property)
  console.log(catObject[property])
}


//while loops
let k = 0
while (k < cats.length) {
  console.log(cats[k]);
  k++;
}

//do while
do {
  console.log(cats[k])
  k = k + 1;
} while (k < 3);


//map - creates a new array from calling a function for every array element.

const cats2 = cats.map(function (cat){
  return 'new ' + cat
})

console.log(cats2)