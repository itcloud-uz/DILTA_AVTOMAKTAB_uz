package uz.delta.avtomaktab;

import android.content.Context;
import android.content.DialogInterface;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.webkit.WebChromeClient;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Button;
import android.widget.EditText;
import android.widget.LinearLayout;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.swiperefreshlayout.widget.SwipeRefreshLayout;

public class MainActivity extends AppCompatActivity {

    private static final String PREFS_NAME = "DeltaAvtoPrefs";
    private static final String KEY_SERVER_URL = "server_url";

    private SwipeRefreshLayout swipeContainer;
    private WebView webView;
    private LinearLayout setupLayout;
    private EditText urlInput;
    private Button connectButton;

    private SharedPreferences sharedPreferences;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        sharedPreferences = getSharedPreferences(PREFS_NAME, Context.MODE_PRIVATE);

        swipeContainer = findViewById(R.id.swipeContainer);
        webView = findViewById(R.id.webView);
        setupLayout = findViewById(R.id.setupLayout);
        urlInput = findViewById(R.id.urlInput);
        connectButton = findViewById(R.id.connectButton);

        // Configure WebView
        WebSettings webSettings = webView.getSettings();
        webSettings.setJavaScriptEnabled(true);
        webSettings.setDomStorageEnabled(true);
        webSettings.setDatabaseEnabled(true);
        webSettings.setAllowFileAccess(true);
        webSettings.setCacheMode(WebSettings.LOAD_DEFAULT);
        webSettings.setUseWideViewPort(true);
        webSettings.setLoadWithOverviewMode(true);
        webSettings.setMediaPlaybackRequiresUserGesture(false);

        webView.setWebViewClient(new WebViewClient() {
            @Override
            public void onPageFinished(WebView view, String url) {
                swipeContainer.setRefreshing(false);
            }
        });
        webView.setWebChromeClient(new WebChromeClient());

        swipeContainer.setOnRefreshListener(new SwipeRefreshLayout.OnRefreshListener() {
            @Override
            public void onRefresh() {
                webView.reload();
            }
        });

        connectButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String url = urlInput.getText().toString().trim();
                if (url.isEmpty()) {
                    Toast.makeText(MainActivity.this, "Iltimos, manzilni kiriting!", Toast.LENGTH_SHORT).show();
                    return;
                }
                if (!url.startsWith("http://") && !url.startsWith("https://")) {
                    url = "https://" + url;
                }
                
                // Save URL and load
                sharedPreferences.edit().putString(KEY_SERVER_URL, url).apply();
                loadAppUrl(url);
            }
        });

        // Check if URL is already saved
        String savedUrl = sharedPreferences.getString(KEY_SERVER_URL, "");
        if (!savedUrl.isEmpty()) {
            loadAppUrl(savedUrl);
        } else {
            showSetupLayout();
        }
    }

    private void loadAppUrl(String url) {
        setupLayout.setVisibility(View.GONE);
        swipeContainer.setVisibility(View.VISIBLE);
        
        java.util.Map<String, String> extraHeaders = new java.util.HashMap<>();
        extraHeaders.put("Bypass-Tunnel-Reminder", "true");
        webView.loadUrl(url, extraHeaders);
    }

    private void showSetupLayout() {
        swipeContainer.setVisibility(View.GONE);
        setupLayout.setVisibility(View.VISIBLE);
        String currentUrl = sharedPreferences.getString(KEY_SERVER_URL, "");
        urlInput.setText(currentUrl);
    }

    @Override
    public void onBackPressed() {
        if (webView.getVisibility() == View.VISIBLE && webView.canGoBack()) {
            webView.goBack();
        } else {
            super.onBackPressed();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        menu.add(0, 1, 0, "Sahifani yangilash");
        menu.add(0, 2, 0, "Server manzilini o'zgartirish");
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(@NonNull MenuItem item) {
        if (item.getItemId() == 1) {
            if (webView.getVisibility() == View.VISIBLE) {
                webView.reload();
            }
            return true;
        } else if (item.getItemId() == 2) {
            showUrlChangeDialog();
            return true;
        }
        return super.onOptionsItemSelected(item);
    }

    private void showUrlChangeDialog() {
        final EditText input = new EditText(this);
        input.setPadding(24, 24, 24, 24);
        String currentUrl = sharedPreferences.getString(KEY_SERVER_URL, "");
        input.setText(currentUrl);

        new AlertDialog.Builder(this)
                .setTitle("Server manzilini o'zgartirish")
                .setMessage("Yangi server manzilini (localtunnel URL) kiriting:")
                .setView(input)
                .setPositiveButton("Saqlash", new DialogInterface.OnClickListener() {
                    @Override
                    public void onClick(DialogInterface dialog, int which) {
                        String newUrl = input.getText().toString().trim();
                        if (!newUrl.isEmpty()) {
                            if (!newUrl.startsWith("http://") && !newUrl.startsWith("https://")) {
                                newUrl = "https://" + newUrl;
                            }
                            sharedPreferences.edit().putString(KEY_SERVER_URL, newUrl).apply();
                            loadAppUrl(newUrl);
                        }
                    }
                })
                .setNegativeButton("Bekor qilish", null)
                .show();
    }
}
