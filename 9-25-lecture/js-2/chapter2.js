// statement
const name = 'nate';

//block
if (name) {
    console.log(name)
}

//variables
if (true) {
    var blockVar = 'test'
    const blockConst = 'test2'
    let blockLet = 'test3'
}
console.log(blockVar)
console.log(blockConst)
console.log(blockLet)

//template literals
const string1 = 'yo'
const templateLiteral = `${string1} what up?`
console.log(templateLiteral)

//escape characters
const specialChar = "\"quotes\""
console.log(specialChar)

//arrays
const array = [1,2,3, "test", true, [1,2,3]];

//length

console.log(array.length)

array.push(4);
console.log(array);

//join

//more
//https://www.w3schools.com/js/js_array_methods.asp

//expressions
if ('1' === 1) {
    console.log('true');
} else {
    console.log('false');
}

//== no type checking
//=== includes type checking

//operators