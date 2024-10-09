//Before the interpreter executes the whole code, it first hoists (raises, or lifts) the declared function to the top of the scope it is defined in.

// printHello()
// // hello
//
// function printHello() {
//   console.log("hello")
// }


//but only in the function scope
// printHello()
//
// printDillion()
//
// function printHello() {
//   console.log('hello')
//   printDillion()
//
//   function printDillion() {
//     console.log("dillion")
//   }
// }


//variables too
// console.log(name)
//
// const name = "Dillion"


//function scope only
print()
// console.log(name)

function print() {
  console.log(name)
  // undefined but created

  const name = "Dillion"
}
