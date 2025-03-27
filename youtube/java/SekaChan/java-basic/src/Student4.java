public class Student4 {
    String name;
    static int counter = 0;


    Student4(String n) {
        name = n;
        counter ++;
        System.out.println(name + "'s instance get generated");
    }

    static void display() {
        System.out.println(counter);
    }
    
}
