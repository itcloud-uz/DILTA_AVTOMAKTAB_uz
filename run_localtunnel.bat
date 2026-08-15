@echo off
:loop
echo [%date% %time%] Starting Cloudflare Tunnel...
taskkill /f /im cloudflared.exe >nul 2>&1
del localtunnel_url.txt >nul 2>&1
del cloudflared_log.txt >nul 2>&1

start /b cmd /c "cloudflared.exe tunnel --url http://127.0.0.1:8000 > cloudflared_log.txt 2>&1"
echo Waiting for Cloudflare Tunnel URL...

:wait_loop
timeout /t 1 >nul
if not exist cloudflared_log.txt goto wait_loop

powershell -Command "$c = Get-Content cloudflared_log.txt -ErrorAction SilentlyContinue; if ($c) { $m = [regex]::Match($c, 'https://[a-zA-Z0-9-.]+\.trycloudflare\.com'); if ($m.Success) { $m.Value.Trim() | Out-File -FilePath localtunnel_url.txt -Encoding utf8; } }"

if not exist localtunnel_url.txt goto wait_loop

echo [%date% %time%] Cloudflare Tunnel started successfully!
type localtunnel_url.txt

:monitor_loop
tasklist /fi "imagename eq cloudflared.exe" | find "cloudflared.exe" >nul
if %errorlevel% equ 0 (
    timeout /t 5 >nul
    goto monitor_loop
)

echo [%date% %time%] Cloudflare Tunnel exited. Restarting in 5 seconds...
timeout /t 5
goto loop
