// Normal function
console.log(myFunction());

function myFunction(){
    return 100;
}

// Arrow function

    // console.log(ArrowHosting());

    // var ArrowHosting = () => {
    //     return 50;
    // }

// 1. Arrow function are NOT hoisted
// 2. `this` in arrow function is binded to the previous value of this

var Mycar = {
    name: "BMW",
    innerArrow: () => {
        console.log(`This is my car ${this.name}`);
    },
    innerNormal: function(){
        console.log(`This is my car ${this.name}`);
    }
}
Mycar.innerArrow();
Mycar.innerNormal();