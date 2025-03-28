public class Student3 extends Person3 {
    private int stuNo;


    Student3(String name) {
        this(name, 999);
    }

    Student3(String name, int stuNo){
        super(name);
        this.stuNo = stuNo;
    }

    void display() {
        super.display();
        System.err.println(this.stuNo);
    }
}
