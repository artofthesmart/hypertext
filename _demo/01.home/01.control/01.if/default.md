---
allowCSS: default
allowJS: default
show_header_image: false
show_clickthrough: true
title: 'If Statements'
media_order: 'crossroads.webp,dog.webp'
subtitle: 'Conditionals make your code work right.'
---

===

Hello, fellow coders! It’s Michelle here, sharing some insights from the chilly but beautiful Ontario, Canada. When I'm not baking or taking my dogs, Jasper and Cody, for a swim, I love diving into the world of coding. Today, I'm excited to walk you through one of the foundational concepts in JavaScript — the **if statement**. Whether you're just starting out or you're looking to brush up on your basics, understanding if statements is crucial for controlling the flow of your programs.

## What is an If Statement?

An if statement in JavaScript allows you to make decisions in your code based on conditions. Think of it as a crossroad where you can choose which path to take based on the conditions met. Here’s the simplest form of an if statement:

```javascript
if (condition) {
  // code to execute if condition is true
}
```

For example, let's say we want our program to greet us only in the morning. Here’s how you might write that:

```javascript
let hour = new Date().getHours(); // Gets the current hour
if (hour < 12) {
  console.log("Good morning!");
}
```

![An image showing a cartoon of a person standing at a crossroads with signs pointing to "True" and "False" paths, symbolizing an if statement decision-making process.](crossroads.webp)

## Adding Complexity: Else and Else If

As you get more comfortable with basic if statements, you might find that you need more options. That's where `else` and `else if` come into play. These allow you to handle multiple conditions by chaining them together. Here’s a look at a more complex scenario:

```javascript
if (hour < 12) {
  console.log("Good morning!");
} else if (hour < 18) {
  console.log("Good afternoon!");
} else {
  console.log("Good evening!");
}
```

This code checks the time of day and greets you accordingly. It’s a great example of how if statements can be expanded to cover multiple conditions, making your programs smarter and more interactive.

## Practical Application: A Real-World Example

Let’s put our knowledge into practice with a real-world application. Suppose we're building a website feature that recommends a pet activity based on the weather:

```javascript
let weather = "sunny";
let temperature = 20; // in degrees Celsius

if (weather === "rainy") {
  console.log("It's rainy. Let's stay indoors and play fetch!");
} else if (weather === "sunny" && temperature > 20) {
  console.log("It's warm and sunny. Perfect for a swim!");
} else if (weather === "sunny" && temperature <= 20) {
  console.log("It's cool but sunny. How about a nice walk?");
} else {
  console.log("Unique weather today! Let's just chill inside.");
}
```

This example demonstrates using both multiple conditions and combining conditions with logical operators (`&&`), increasing the sophistication of our decisions.

![An image depicting a cartoon scenario where a dog chooses between toys based on different weather conditions displayed on a computer screen.](dog.webp)

If statements are a powerful tool in your JavaScript toolkit. They allow your programs to react dynamically to different inputs and situations, much like choosing what to bake based on what ingredients you have at home or deciding whether it's a good day for a swim. Dive into these examples, tweak them, and watch how they can transform your code. Happy coding!