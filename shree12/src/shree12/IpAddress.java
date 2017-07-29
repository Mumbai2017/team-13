package CN;
import java.lang.*;
import java.util.*;
public class IpAddress {

	public IpAddress() {
		// TODO Auto-generated constructor stub
	}
	int[] btod(String add[])
	{
		int k[]=new int[4],i,j;
		for(i=0;i<4;i++)
		{
			for(j=0;j<8;j++)
			{
				if(add[i].charAt(j)=='1')
				{
					k[i]=k[i]+(int)Math.pow(2,8-j-1);
				}
			}
		}
		return k;
	}
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Scanner sc=new Scanner(System.in);
        String a,add[];
        int c,i;
        System.out.println("1.IP In Binary\n2.IP In Decimal");
        c=sc.nextInt();
        int k[]=new int[4];
        switch(c)
        {
        case 1:
        	System.out.println("Enter the IP");
        	a=sc.next(); 
            add=a.split("\\.");
            IpAddress ip=new IpAddress();
            k=ip.btod(add);
            break;
        case 2:
        	System.out.println("Enter the IP");
        	a=sc.next(); 
            add=a.split("\\.");
            for(i=0;i<4;i++)
            	k[i]=Integer.parseInt(add[i]);
            break;
        }
        if(k[0]<=127)
        {
        	System.out.println("This is a class A address");
        	System.out.println("The default mask is 255.0.0.0"+" and the network id is "+k[0]);
        	System.out.println("The first address is "+k[0]+".0.0.0");
        	System.out.println("The last address is "+k[0]+".255.255.255");
        }
        else if(k[0]>=128&&k[0]<=191)
        {
        	System.out.println("This is a class B address");
        	System.out.println("The default mask is 255.255.0.0"+" and the network id is "+k[0]+"."+k[1]);
        	System.out.println("The first address is "+k[0]+"."+k[1]+".0.0");
        	System.out.println("The last address is "+k[0]+"."+k[1]+".255.255");
        }
        else if(k[0]>=192&&k[0]<=223)
        {
        	System.out.println("This is a class C address");
        	System.out.println("The default mask is 255.255.255.0"+" and the network id is "+k[0]+"."+k[1]+"."+k[2]);
        	System.out.println("The first address is "+k[0]+"."+k[1]+"."+k[2]+".0");
        	System.out.println("The last address is "+k[0]+"."+k[1]+"."+k[2]+".255");
        }
        else if(k[0]>=224&&k[0]<=239)
        {
        	System.out.println("This is a class D address");
        }
        else
        {
        	System.out.println("This is a class E address");
        }

	}

}
