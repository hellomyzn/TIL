import java.io.*;

public class ThrowsMethod {
    public static void main(String[] args) {
        WriteFile wf = new WriteFile();
        try {
            wf.open();
            wf.write();
        } catch (IOException e) {
            System.err.println("IOException");
            e.printStackTrace();;

        } catch (Exception e) {
            System.err.println("Exception");
            e.printStackTrace();;
            
        } finally {
            wf.close();
        }
    }
    
}
