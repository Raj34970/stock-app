package com.example.stockosio;
import androidx.appcompat.app.AppCompatActivity;
import android.webkit.WebView;
import android.os.Bundle;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.Statement;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        WebView webview = (WebView) findViewById(R.id.webview);
        webview.loadUrl("file:///android_asset/index.html");
        String url, user="root", pass="",sql="Select * from clients";
        try {
            url = "jdbc:mysql://localhost:3306/stock";
            Connection conn = DriverManager.getConnection(url, user, pass);
            Statement stmt = conn.createStatement();
            ResultSet rslt = stmt.executeQuery(sql);
            while (rslt.next()) {
                System.out.println(rslt.getString("date"));
            }
        }
        catch (Exception e) {
            e.printStackTrace();

        }
    }
}