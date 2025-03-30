abstract public class Club {
    private String name;
    public Club (String name) {
        this.name = name;
    }

    public void display (){
        System.err.println(this.name);
    }

    public abstract void practice();
    
}
