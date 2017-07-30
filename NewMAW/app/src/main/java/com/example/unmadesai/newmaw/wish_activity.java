package com.example.unmadesai.newmaw;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.SearchView;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;

public class wish_activity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_wish_activity);
        EditText editText= (EditText) findViewById(R.id.et_search);
        String s=editText.getText().toString();

        TextView tv = (TextView) findViewById(R.id.tvCity1);
        String s2=tv.toString();
        TextView tv1 = (TextView) findViewById(R.id.tvCity2);
        String s3=tv1.toString();
        TextView tv2 = (TextView) findViewById(R.id.tvCity3);
        String s4=tv2.toString();



        EditText.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

            }
        }
        int i = 0;
        while (s2.charAt(i) != ',')
            i++;
        s2 = s2.substring(i, s2.length());
        if(s2.equals(s))
        {
            tv.setEnabled(true);
        }
        else {
            tv.setEnabled(false);
        }
        int j = 0;
        while (s3.charAt(j) != ',')
            j++;
        s3 = s3.substring(j, s3.length());
        if(s3.equals(s))
        {
            tv1.setEnabled(true);
        }
        else {
            tv1.setEnabled(false);
        }
        int k = 0;
        while (s4.charAt(k) != ',')
            k++;
        s4 = s4.substring(k, s4.length());
        if(s4.equals(s))
        {
            tv2.setEnabled(true);
        }
        else {
            tv2.setEnabled(false);
        }
    }
}
