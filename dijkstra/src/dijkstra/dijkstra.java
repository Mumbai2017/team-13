package dijkstra;

import java.util.Scanner;

class dijkstra{

	public static final int INT_MAX=999;
	public static int v;
	
	public static int min_dist(int[] dist,int vertex_counted[]){
		int min=INT_MAX;
		int min_index=-1;
		for(int i=0; i<v; i++)
        		if(vertex_counted[i]==0 && dist[i]<min)
        		{
            			min = dist[i];
            			min_index = i;
        		}
    		return min_index;
	}

	public static void dijk(int g[][],int src){
		int vertex_counted[]=new int[v],dist[]=new int[v];
    		for(int i=0; i<v; i++)
    		{
        		dist[i]=INT_MAX;
        		vertex_counted[i]=0;
    		}
    		dist[src] = 0;
    		for(int i=0; i<v-1; i++)
    		{
        		int u=min_dist(dist,vertex_counted);
        		vertex_counted[u]=1;
        		for(int j=0; j<v; j++)
            			if( g[u][j]!=0 && vertex_counted[j]==0 && dist[u]!=INT_MAX && g[u][j]+dist[u] < dist[j] )
			                dist[j] = g[u][j]+dist[u];
    		}

		System.out.println("Vertex\tDistance\n");
		for(int i=0; i<v; i++)
        		System.out.println(""+i+dist[i]);
	}
/*
9
0 4 0 0 0 0 0 8 0
4 0 8 0 0 0 0 11 0
0 8 0 7 0 4 0 0 2
0 0 7 0 9 14 0 0 0
0 0 0 9 0 10 0 0 0
0 0 4 0 10 0 2 0 0
0 0 0 14 0 2 0 1 6
8 11 0 0 0 0 1 0 7
0 0 2 0 0 0 6 7 0
0

4
0 4 0 9
4 0 5 2
0 5 0 3
9 2 3 0
1

*/	

	public static void main(String args[]){
		Scanner s=new Scanner(System.in);
		System.out.println("Enter the number of Vertices's : ");
		v=s.nextInt();
		int g[][] = new int[v][v];
    		System.out.println("Enter the graph matrix :\n");
    		for(int i=0; i<v; i++)
        		for(int j=0; j<v; j++)
				g[i][j]=s.nextInt();
    		System.out.println("Enter the source vertex : ");
    		int src=s.nextInt();
    		dijk(g,src);		
	}
}