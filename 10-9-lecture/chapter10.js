//execution contexts
//
// function stack1(){
//     console.log('calling from stack1')
//     stack2()
// }
// //
// function stack2() {
//     // throw new Error('broken')
//     console.log('calling from stack2')
// }
// //
// console.log("console 1")
// //
// stack1();
// //
// console.log("console 2")


//errors

// const test = 'yo'
// JSON.parse(test)
try {
  const test = 'yo'
  JSON.parse(test)
} catch (e) {
  console.log(e)
} finally {
  //will run either way
}
// //wrapping in a try catch will handle the error and allow the program to continue
console.log('after')

// throw new Error('something broke')