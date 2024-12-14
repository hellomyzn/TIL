class Person2 {
  firstName: string;
  lastName: string;
  constructor(firstName: string, lastName: string) {
    this.firstName = firstName;
    this.lastName = lastName;
  }

  fullName(): string {
    return `${this.firstName} ${this.lastName}`;
  }
}

const user7 = new Person2("John", "hoge");
console.log(user7.fullName());
user7.firstName = "fuga";
console.log(user7.fullName());

class Person3 {
  private firstName: string;
  lastName: string;
  constructor(firstName: string, lastName: string) {
    this.firstName = firstName;
    this.lastName = lastName;
  }

  fullName(): string {
    return `${this.firstName} ${this.lastName}`;
  }
}

const user8 = new Person3("John", "hoge");
// error
// user7.firstName = "fuga";
console.log(user8.fullName());

class Person4 {
  protected firstName: string;
  lastName: string;
  constructor(firstName: string, lastName: string) {
    this.firstName = firstName;
    this.lastName = lastName;
  }

  fullName(): string {
    return `${this.firstName} ${this.lastName}`;
  }
}

class User1 extends Person4 {
  isAdmin: boolean;
  constructor(firstName: string, lastName: string, isAdmin: boolean) {
    super(firstName, lastName);
    this.isAdmin = isAdmin;
  }
  fullName(): string {
    return super.fullName();
  }

  yourFirstName(): void {
    console.log(this.firstName);
  }
}

const user9 = new User1("John", "Tom", true);
// not allowed since is's protected variable
// user9.firstName = "hoge";
user9.yourFirstName();

class Person5 {
  readonly firstName: string;
  lastName: string;

  constructor(firstName: string, lastName: string) {
    this.firstName = firstName;
    this.lastName = lastName;
  }
  fullName(): string {
    return `${this.firstName} ${this.lastName}`;
  }
  // error since firstName is readonly
  // setName(name: string): void {
  //   this.firstName = name;
  // }
}

const user10 = new Person5("Eiji", "Miyazono");
// user10.setName("hoge");
console.log(user10.fullName());

class Person6 {
  constructor(public firstName: string, public lastName: string) {}
  fullName(): string {
    return `${this.firstName} ${this.lastName}`;
  }
}

const user11 = new Person6("eiji", "m");
console.log(user11.fullName());
