# Read Before You Start!

1️⃣ Download starter code
Before starting the course, please download the starter files and final code from the GitHub repo below 👇
https://github.com/jonasschmedtmann/html-css-course

🚨 Please read the FAQ on GitHub! Believe me, you will ask some of these questions eventually 😉

👉 Starter and final code and FAQs on GitHub

2️⃣ Download course material
Please also download the additional materials from the end of this lecture (choose just one of the theory-lectures): 👇

👉 theory-lectures-v2-BEST.pdf are slides for all theory lectures, with GOOD image quality (481 MB download)

👉 theory-lectures-v2-SMALLER.pdf are slides for all theory lectures, with AVERAGE image quality (158 MB download)

👉 all-design-guidelines.pdf is a summary of all the web design rules and guidelines we will study in Section 5

3️⃣ Community & resources
👉 We have a very friendly student community on Discord with 75,000+ students. This is where you learn together with other students just like you, and it's also where you can get updates on new courses. Join by clicking here!

👉 During the course, we use many online tools and resources, which are all on my resources page.

👋 Pro tip: Don't use lecture numbers when taking notes, because they will change each time I update something in the course.

And now, have a lot of fun with the course! 😁

### Box Model

![css-box-model](./img/css-box-model.png)
![element height and width calculation](./img/height-and-width-calculation.png)

### Elements Level

![block level](./img/block-level.png)
![inline](./img/inline.png)
![inline-block](./img/inline-block.png)

### Positioning

![positioning](./img/positioning.png)
![positioning02](./img/positioning02.png)

### float

![float](./img/float.png)

```html
<header class="main-header clearfix">
  <h1>📘 The Code Magazine</h1>

  <nav>
    <a href="blog.html">Blog</a>
    <a href="#">Challenges</a>
    <a href="#">Flexbox</a>
    <a href="#">CSS Grid</a>
  </nav>
</header>
```

```css
.main-header {
  background-color: #f7f7f7;
  padding: 20px 40px;
  margin-bottom: 60px;
}
h1 {
  float: left;
}

nav {
  float: right;
}

.clearfix::after {
  clear: both;
  content: "";
  display: block;
}
```

### Box Model With box-sizing: border-box

![box-sizing](./img/box-sizing.png)
universal selector で使用する

```css
* {
  /* border-top: 10px solid #1098ad; */
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
```

## Useful Service

- [w3c html vlidator](https://validator.w3.org/)
- [diff checker](https://www.diffchecker.com/)
