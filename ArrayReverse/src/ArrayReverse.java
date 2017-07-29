import java.io.*;
import java.util.*;

package com.example.sarvajna.plainnotes2;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

/**
 * Created by Sarvajna on 29-06-2017.
 */

public class DBOpenHelper extends SQLiteOpenHelper {
    private static final String DATABASE_NAME = "notes.db";
    private static final int DATABASE_VERSION = 1;

    //Constants for identifying table and columns
    public static final String TABLE_NOTES = "notes";
    public static final String NOTE_ID = "_id";
    public static final String NOTE_TEXT = "noteText";
    public static final String NOTE_CREATED = "noteCreated";

    public static final String[] ALL_COLUMNS={NOTE_ID,NOTE_TEXT,NOTE_CREATED};

    //SQL to create table
    private static final String TABLE_CREATE =
            "CREATE TABLE " + TABLE_NOTES + " (" +
                    NOTE_ID + " INTEGER PRIMARY KEY AUTOINCREMENT, " +
                    NOTE_TEXT + " TEXT, " +
                    NOTE_CREATED + " TEXT default CURRENT_TIMESTAMP" +
                    ")";

    public DBOpenHelper(Context context) {
        super(context, DATABASE_NAME, null, DATABASE_VERSION);
    }

    @Override
    public void onCreate(SQLiteDatabase sqLiteDatabase) {

        sqLiteDatabase.execSQL(TABLE_CREATE);
    }

    @Override
    public void onUpgrade(SQLiteDatabase sqLiteDatabase, int i, int i1) {
        sqLiteDatabase.execSQL("DROP TABLE IF EXISTS "+TABLE_NOTES);
        onCreate(sqLiteDatabase);
    }
}


public class ArrayReverse {

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        Deque q=new LinkedList();
        
        int n=sc.nextInt();
        
        for(int i=0;i<n;i++)
            q.add(sc.nextBigInteger());
        
        for(int i=0;i<n;i++)
            System.out.print(q.removeLast()+" ");
    }
}
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
