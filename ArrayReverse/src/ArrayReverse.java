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


