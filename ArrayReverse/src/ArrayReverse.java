import java.io.*;
import java.util.*;

package com.example.sarvajna.plainnotes2;

import android.content.Context;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;


package com.example.sarvajna.plainnotes2;
        btnSubmit= (Button) findViewById(R.id.btnSubmit);

        btnSubmit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent i=new Intent(Main2Activity.this,MainActivity.class);
                startActivity(i);

            }
        });

    }


    }



import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.content.Context;
import android.database.Cursor;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.CursorAdapter;
import android.widget.TextView;

public class Main2Activity extends AppCompatActivity {
Button btnSubmit;
    @Override

    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main2);
/**
 * Created by Sarvajna on 29-06-2017.
 */

package com.example.sarvajna.plainnotes2;

import android.content.ContentValues;
import android.content.Intent;
import android.database.Cursor;
import android.net.Uri;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.EditText;
import android.widget.Toast;

public class EditorActivity extends AppCompatActivity {

    private String  action;   //to remember whether i m inserting or updating
    private EditText editor;
    private String noteFilter;
    private String oldText;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_editor);

        editor= (EditText) findViewById(R.id.editText);
        Intent intent=getIntent();
        Uri uri=intent.getParcelableExtra(NotesProvider.CONTENT_ITEM_TYPE);

        if(uri==null)   //means i am inserting a new node
        {
            action=Intent.ACTION_INSERT;
            setTitle(getString(R.string.new_note));
        }else{
            action = Intent.ACTION_EDIT;
            noteFilter=DBOpenHelper.NOTE_ID+ "=" +uri.getLastPathSegment();

            Cursor cursor=getContentResolver().query(uri,DBOpenHelper.ALL_COLUMNS,noteFilter,null,null);
            cursor.moveToFirst();
            oldText=cursor.getString(cursor.getColumnIndex(DBOpenHelper.NOTE_TEXT));
            editor.setText(oldText);
            editor.requestFocus();
        }
    }
    private void finishedEditing(){
        String newText=editor.getText().toString().trim();

        switch(action){
            case Intent.ACTION_INSERT:
                if(newText.length()==0)
                {
                    setResult(RESULT_CANCELED);    //predifened
                }else
                {
                    insetNote(newText);
                }
                break;
            case Intent.ACTION_EDIT:
                if(newText.length()==0)
                {
                    deleteNote();
                }else if(oldText.equals(newText)){
                    setResult(RESULT_CANCELED);
                }else{
                    updateNote(newText);
                }
        }
        finish();
    }


    private void updateNote(String NoteText) {
        ContentValues values=new ContentValues();
        values.put(DBOpenHelper.NOTE_TEXT,NoteText);
        getContentResolver().update(NotesProvider.CONTENT_URI,values,noteFilter,null);
        Toast.makeText(this, R.string.note_updated,Toast.LENGTH_LONG).show();
        setResult(RESULT_OK);
    }
    private void insetNote(String NoteText) {
        ContentValues values=new ContentValues();
        values.put(DBOpenHelper.NOTE_TEXT,NoteText);
         getContentResolver().insert(NotesProvider.CONTENT_URI,values); //inserted a row in database table
        setResult(RESULT_OK);
    }

    @Override
    public void onBackPressed() {
        finishedEditing();
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        if(action.equals(Intent.ACTION_EDIT)) {

            getMenuInflater().inflate(R.menu.menu_editor, menu);
        }
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {

        int id=item.getItemId();
        switch(id){
            case R.id.home:
            finishedEditing();
                break;
            case R.id.action_delete:
                deleteNote();
                break;

        }

        return super.onOptionsItemSelected(item);
    }

    private void deleteNote() {
    getContentResolver().delete(NotesProvider.CONTENT_URI,noteFilter,null);
        Toast.makeText(this, R.string.note_deleted,Toast.LENGTH_LONG).show();
        setResult(RESULT_OK);
        finish();

    }
}


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
