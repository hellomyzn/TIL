public class MyClass {
    public static void main(String[] args) {

        // 文字列
        // p1_1
        String str;
        str = "Hello!";
        System.out.println(str);

        // p1_2
        String str1, str2;
        str1 = "Hello";
        str2 = "World!!";
        str = str1 + " " + str2;
        System.out.println(str);

        // p1_3
        Character ch;
        ch = 'あ';
        System.out.println(ch+":"+(int)ch);

        // p1_4
        int ix;
        ix = 1234;
        String str3;
        str3 = String.valueOf(ix);

        // p1_5
        String str4 = "5432";
        int ixx;
        ixx = Integer.parseInt(str4);

        // e1
        String name, name_san;
        name = "myzn";
        name_san = name + "-san";
        System.out.println(name_san);
    }
}
