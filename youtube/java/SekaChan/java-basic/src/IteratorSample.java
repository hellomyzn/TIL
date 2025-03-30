import java.util.ArrayList;
import java.util.Iterator;

public class IteratorSample {
    public static void main(String[] args) {
        ArrayList <String> list = new ArrayList<String>();
        list.add("hoge");
        list.add("fuga");
        list.add("piyo");

        Iterator<String> it = list.iterator();
        while (it.hasNext()){
            System.err.println(it.next());
        }
        
    }
    
}
