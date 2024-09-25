// we can create an object with the template literal syntax
const cat = {
    name: 'Pinecone',
    color: 'grey',
    type: 'long hair',
    meow: function ()  {
        console.log(this.name)
    },
    meow2: () => {
        console.log(this.name)

    }
}

// console.log(cat.name)
cat.meow()
cat.meow2()


