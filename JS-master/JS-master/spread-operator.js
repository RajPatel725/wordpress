const user1 = [1, 2, 3];
const user2 = [4, 5, 6];

const users = [...user1, ...user2];

// This is simple spread operator
console.log(users);

const [one, two, three, ...rest] = users;

// The spread operator is often used in combination with destructuring.

console.log(one);
console.log(two);
console.log(rest[0]); // return 4