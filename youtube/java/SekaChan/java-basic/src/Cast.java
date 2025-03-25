public class Cast {
    public static void main(String[] args) {
       int price = Integer.parseInt(args[0]) ;
       double rate = 0.08;
       int amount;

       amount = (int)(price * (1 + rate));
       System.err.println("tax price: " + amount + " yen");

    }
    
}
