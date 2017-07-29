public class NotesCursorAdapter extends CursorAdapter {
    public NotesCursorAdapter(Context context, Cursor c, int flags) {
        super(context, c, flags);
    }

    @Override
    public View newView(Context context, Cursor cursor, ViewGroup viewGroup) {
        return LayoutInflater.from(context).inflate(R.layout.note_list_item, viewGroup,false);

    }

    @Override
    public void bindView(View view, Context context, Cursor cursor) {
        String noteText=cursor.getString(cursor.getColumnIndex(DBOpenHelper.NOTE_TEXT));
        int pos=noteText.indexOf(10); //ascii value of line feed
        if(pos!=-1){
            noteText=noteText.substring(0,pos)+"....";
        }
        TextView tv= (TextView) view.findViewById(R.id.tvNote);
        tv.setText(noteText);

    }
}


public class NotesCursorAdapter extends CursorAdapter {
    public NotesCursorAdapter(Context context, Cursor c, int flags) {
        super(context, c, flags);
    }

    @Override
    public View newView(Context context, Cursor cursor, ViewGroup viewGroup) {
        return LayoutInflater.from(context).inflate(R.layout.note_list_item, viewGroup,false);

    }

    @Override
    public void bindView(View view, Context context, Cursor cursor) {
        String noteText=cursor.getString(cursor.getColumnIndex(DBOpenHelper.NOTE_TEXT));
        int pos=noteText.indexOf(10); //ascii value of line feed
        if(pos!=-1){
            noteText=noteText.substring(0,pos)+"....";
        }
        TextView tv= (TextView) view.findViewById(R.id.tvNote);
        tv.setText(noteText);

    }
}
package com.example.sarvajna.plainnotes2;

import android.content.ContentProvider;
import android.content.ContentValues;
import android.content.UriMatcher;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.net.Uri;
import android.support.annotation.Nullable;

public class NotesProvider extends ContentProvider{
    private static final String AUTHORITY = "com.example.plainolnotes.notesprovider2";
    private static final String BASE_PATH = "notes";
    public static final Uri CONTENT_URI = Uri.parse("content://" + AUTHORITY + "/" + BASE_PATH );

    // Constant to identify the requested operation
    private static final int NOTES = 1;  //means give me the data
    private static final int NOTES_ID = 2;  //Notes_ID operation will deal with only a single record

    private static final UriMatcher uriMatcher=new UriMatcher(UriMatcher.NO_MATCH); //to chech which operation is requested

    public static final String CONTENT_ITEM_TYPE=" Note ";

    static {

        uriMatcher.addURI(AUTHORITY,BASE_PATH,NOTES);
        uriMatcher.addURI(AUTHORITY,BASE_PATH+ "/#",NOTES_ID);     // it means / and any number
    }

    private SQLiteDatabase database;
    @Override
    public boolean onCreate() {

        DBOpenHelper  helper=new DBOpenHelper(getContext());

        database = helper.getWritableDatabase();
        return true;
    }

    @Nullable
    @Override
    public Cursor query(Uri uri, String[] strings, String s, String[] strings1, String s1) {

        if(uriMatcher.match(uri)==NOTES_ID){
            s=DBOpenHelper.NOTE_ID+ "=" +uri.getLastPathSegment();
        }
        return database.query(DBOpenHelper.TABLE_NOTES,DBOpenHelper.ALL_COLUMNS,s,null,null,null,DBOpenHelper.NOTE_CREATED+ " DESC");
    }

    @Nullable
    @Override
    public String getType(Uri uri) {
        return null;
    }

    @Nullable
    @Override
    public Uri insert(Uri uri, ContentValues contentValues) {
        long id =database.insert(DBOpenHelper.TABLE_NOTES,null,contentValues);
        return Uri.parse(BASE_PATH + "/" + id);

    }

    @Override
    public int delete(Uri uri, String s, String[] strings) {
        return database.delete(DBOpenHelper.TABLE_NOTES,s,strings);
    }

    @Override
    public int update(Uri uri, ContentValues contentValues, String s, String[] strings) {
        return database.update(DBOpenHelper.TABLE_NOTES,contentValues,s,strings);
    }
}



