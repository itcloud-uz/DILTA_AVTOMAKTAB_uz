@echo off
:loop
echo [%date% %time%] Starting localtunnel...
cmd.exe /c "npx -y localtunnel --port 8000 > localtunnel_url.txt"
echo [%date% %time%] Localtunnel exited. Restarting in 5 seconds...
timeout /t 5
goto loop
