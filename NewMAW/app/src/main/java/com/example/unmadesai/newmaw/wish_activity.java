package com.example.unmadesai.newmaw;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.SearchView;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class wish_activity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_wish_activity);
        EditText editText = (EditText) findViewById(R.id.et_search);
        final String s = editText.getText().toString();
        Log.d(s,"place");


        Button search = (Button) findViewById(R.id.search);
        search.setOnClickListener(new View.OnClickListener()
        {
            public void onClick(View view)
            {

                TextView tv = (TextView) findViewById(R.id.tvCity1);
                String s2 = tv.getText().toString();
                TextView tv1 = (TextView) findViewById(R.id.tvCity2);
                String s3 = tv1.getText().toString();
                TextView tv2 = (TextView) findViewById(R.id.tvCity3);
                String s4 = tv2.getText().toString();
                Button btn1=(Button) findViewById(R.id.btnCity1);
                Button btn2=(Button) findViewById(R.id.btnCity2);
                Button btn3=(Button) findViewById(R.id.btnCity3);
                Log.d(s2,"place1");
                Log.d(s3,"place2");
                Log.d(s4,"place3");


                int i = 0;
                while (s2.charAt(i) != ',')
                    i++;
                s2 = s2.substring(i+1, s2.length());
                if (s2.equals(s)) {
                    tv.setText(s);
                } else {
                    tv.setVisibility(View.GONE);
                    btn1.setVisibility(View.GONE);

                }
                int j = 0;
                while (s3.charAt(j) != ',')
                    j++;
                s3 = s3.substring(j, s3.length());
                if (s3.equals(s)) {
                    tv1.setEnabled(true);
                } else {
                    tv1.setVisibility(View.GONE);
                    btn2.setVisibility(View.GONE);
                }
                int k = 0;
                while (s4.charAt(k) != ',')
                    k++;
                s4 = s4.substring(k, s4.length());
                if (s4.equals(s)) {
                    tv2.setEnabled(true);
                } else {
                    tv2.setVisibility(View.GONE);
                    btn3.setVisibility(View.GONE);
                }
            }
        });
    }
}

