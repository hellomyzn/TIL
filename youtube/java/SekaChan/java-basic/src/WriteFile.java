import java.io.*;

public class WriteFile {
    public void open(){
        System.err.println("open file");
    }

    public void write() throws IOException {
        throw new IOException();
    }

    public void close() {
        System.err.println("save file");
    }

    public static void main(String[] args) {
        try {
            BufferedReader r = new BufferedReader(
                new InputStreamReader(System.in));
            PrintWriter w = new PrintWriter(
                new BufferedWriter(new FileWriter("output.txt")));

            String str;
            while((str = r.readLine()) != null) {
                System.err.println(str); // ここを修正
                w.println(str);
            }
        
            r.close();
            w.close();
        } catch (IOException e) {
            System.err.println(e);
        }
    }
}
