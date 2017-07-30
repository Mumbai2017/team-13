import java.util.*;

public class RansomNote {
    
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        int m = scanner.nextInt();
        int n = scanner.nextInt();
        
        // Eat whitespace to beginning of next line
        scanner.nextLine();
        
        String magazine=scanner.nextLine();
        String note=scanner.nextLine();
        scanner.close();
        
        HashMap<String,Integer> hm =new HashMap<String,Integer>();
        String[] res1=magazine.split(" ");
        for(int i=0;i<res1.length;i++)
            {
                hm.put(res1[i],1);
        }
        boolean flag=true;
        String  res2[]=note.split(" ");
        for(int i=0;i<res2.length;i++)
            {
                if(!hm.containsKey(res2[i]))
                    {
                        flag=false;
                        break;
                }
        }
        if(flag)
            System.out.println("Yes");
        else
            System.out.println("No");
      
    }
}