// Aplly, Call & Bind

// Problem statment

let userDetails = {
    name: "Raju",
    age: 23,
    designation: "Software Engineer",
}

function printDetails(city, contry) {
    console.log(this.name + " " + city + " " + contry);
}

// Call
printDetails.call(userDetails, "Keshod", "India");

let userDetails2 = {
    name: "Kishan",
    age: 23,
    designation: "Software Engineer",
}
// function borrowing
printDetails.call(userDetails2, "Ahemdabad", "India");

// Apply
printDetails.apply(userDetails2, ["Ahemdabad", "India"]);

// Bind
const newFun = printDetails.bind(userDetails, "Ahemdabad", "India");
newFun();