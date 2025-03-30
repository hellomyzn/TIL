
public class Student7 implements Englishable{
    private String name;

    public Student7(String name) {
        this.name = name;
    }

    public void display(){
        System.err.println("namae: " + this.name);
    }

    public void displayEng(){
        System.err.println(Englishable.LANGUAGE);
        System.err.println("name: " + this.name);
    }
    
}
