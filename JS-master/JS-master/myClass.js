// Class
class User{
    
    // Method
    constructor(firstName, lastName, age, city){
        this.firstName = firstName;
        this.lastName = lastName;
        this.age = age;
        this.city = city;
    }
    // Method
    getFullName(x,y){
        return `My name is ${this.firstName} ${this.lastName}. and i am ${x-this.age} old. and i am form ${y}.`;
    }
}

const data = new Date();
const year = data.getFullYear();

const myCity = "Keshod";

// Class -> Object
let myName = new User("raj","patel",2000,"ksd");
console.log(myName.getFullName(year,myCity));