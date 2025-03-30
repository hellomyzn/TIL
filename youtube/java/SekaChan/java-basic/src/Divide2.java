public class Divide2 {
    public static void main(String[] args) {
        try {
            int a = Integer.parseInt(args[0]);
            int b = Integer.parseInt(args[1]);
            System.err.println("start");
            System.err.println("a / b = " + (a / b) + " and " + (a % b));
            System.err.println("finish");
        } catch(ArrayIndexOutOfBoundsException e) {
            System.err.println("need 2 args");
            System.err.println("details: " + e.getMessage());
            e.printStackTrace();
        } catch(Exception e) {
            System.err.println("exception");
            System.err.println("details: " + e.getMessage());
            e.printStackTrace();
        } finally {
            System.err.println("end");
        }

    }
    
}
