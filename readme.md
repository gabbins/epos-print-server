# Enabling Extensions in XAMPP (php.ini)

To enable the necessary extensions in XAMPP, follow the steps below:

## Steps

1. **Open XAMPP Control Panel**

   - Launch the XAMPP Control Panel.
   - Stop the Apache server if it’s running.

2. **Edit `php.ini` File**

   - In the XAMPP Control Panel, click on **Config** next to Apache.
   - Select **PHP (php.ini)**. This will open the `php.ini` file in your default text editor.

3. **Uncomment the Extensions**

   - Search for the following lines in the `php.ini` file (use `Ctrl + F` to find each one).
   - Uncomment (remove the semicolon `;`) at the beginning of each line:
     ```ini
     extension=fileinfo
     extension=gd
     extension=gettext
     extension=intl
     ```

4. **Save and Close the `php.ini` File**

   - After uncommenting the lines, save and close the file.

5. **Restart Apache**
   - Go back to the XAMPP Control Panel and restart Apache.

## Conclusion

You have successfully enabled the required extensions in XAMPP. If you encounter any issues, ensure the paths to the extensions are correct in your `php.ini` file.

---


# EPOS Print Server Setup (local system)

Follow these steps to set up the EPOS Print Server:

## Steps

1. **Extract `epos_print_server.zip`**

   - Extract the `epos_print_server.zip` file into the `xampp -> htdocs` directory.

2. **Navigate to `epos_print_server` Folder**

   - Open the `epos_print_server` folder.
   - Right-click inside the folder and select **Open command window here** (or open Command Prompt (CMD) in the folder).

3. **Run WebSocket Server**
   - In the command prompt, run the following command to start the web socket:
     ```bash
     php server.php
     ```

## Conclusion

The EPOS Print Server should now be running, and you can proceed with further printer setup or configuration.

---


# EPOS Printer Setup

Follow these steps to set up the EPOS Printer:

## Steps

1. **Install Printer Driver and Add the Printer**

   - Install the printer driver on your system.
   - Add the printer through your system's printer settings.

2. **Share the Printer**

   - Open **Printer Properties**.
   - Go to the **Sharing** tab.
   - Select the option **"Share this printer"**.
   - Copy and keep the printer name shown.
   - Apply the changes.

3. **Verify Printer Sharing**

   - Open the **File Explorer**.
   - In the address bar, type `\\localhost` and press Enter.
   - The shared printer should appear here.

4. **Test Printer Setup**

   - Open **Command Prompt (CMD)**, Navigate to **C Drive** and run the following commands:

     - Create a test file:

       ```bash
       echo "Hello World" > {filename}   # Example: echo "Hello World" > testfile
       ```

     - Print the test file:
       ```bash
       print /D:"\\%COMPUTERNAME%\{printer name}" {filename}   # Example: print /D:"\\%COMPUTERNAME%\EPSON TM-T88IV Receipt" testfile
       ```

5. **Verify the Print Output**
   - A printout should be produced. If it doesn’t work, try changing the printer ports in the printer properties.

## Conclusion

Your EPOS printer should now be set up and working correctly. If you encounter issues, try adjusting the printer properties or checking the shared settings.

---


# Add Printer to POS

Follow these steps to add a printer to your POS system:

## Steps

1. **Open Receipt Printers Settings**

   - Go to **Settings**.
   - Navigate to **Receipt Printers**.
   - Click on **Add Printer**.

2. **Enter Printer Details**

   - **Printer Name**: Enter the printer name.
   - **Connection Type**: Select **Windows**.
   - **Path**: Enter the printer name again.

3. **Save Changes**

   - Click **Save** to apply the changes.

4. **Configure Business Location Settings**
   - Go to **Settings** -> **Business Locations**.
   - Select the **Settings** option for the desired location.
   - Change the value for **"Receipt Printer Type"**.
   - Select **"Receipt Printers"** from the dropdown.

## Conclusion

The printer has been successfully added to your POS system. If you have any issues, double-check the settings and ensure the printer is correctly configured.
