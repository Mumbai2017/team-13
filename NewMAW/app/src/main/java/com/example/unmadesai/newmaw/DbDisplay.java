package com.example.unmadesai.newmaw;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.TextView;

public class DbDisplay extends AppCompatActivity {

    public TextView textView;
    public static final String jsonUrlString  = "http://localhost/team13/getsampledata.php";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_db_display);
    }


}
