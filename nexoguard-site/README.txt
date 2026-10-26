NEXOGUARD WEBSITE — UPLOAD GUIDE
================================

WHAT'S IN THIS FOLDER
---------------------
index.html                      The whole website (one page with sections)
contact.php                     Sends the contact form to sales@nexoguard.com
.htaccess                       Sends old links (/services, /solutions, /contact) to the new sections
assets/css/styles.css           Colors, fonts, layout
assets/js/main.js               Mobile menu and form messages
assets/img/                     Certification badges, favicon, social preview, founder photo placeholder
assets/Nexoguard-MSP-Partner-Overview.pdf   Your deck (linked in the footer)

Note: ".htaccess" starts with a dot, so some computers hide it. It is inside the zip.


STEP 1 — FILL IN THE BLANKS BEFORE PUBLISHING
---------------------------------------------
Open index.html with a plain text editor (Notepad on Windows, TextEdit in plain-text
mode on Mac, or Hostinger's File Manager editor). Search for "[" to find each blank.
Lines marked "EDIT:" explain what to change.

  Line ~217  Block hours: response time [X] and [roll over / expire]
  Line ~249  Proposal turnaround [2] business days
  Line ~265  Campus project: [Industry], [N] users, [N] buildings
  Line ~267  Campus project result
  Line ~271  ISP project result
  Line ~273  Perimeter project: [N] sites
  Line ~275  Perimeter project result
  Line ~278  40% claim: number of projects and years it was measured over
  Line ~279  Testimonial quote, MSP size, US state
  Line ~298  Founder photo and name
  Line ~299  Founder title, years, certifications, notable project
  Line ~313  FAQ: escalation response time [X]
  Line ~319  FAQ: minimum commitment
  Line ~320  FAQ: NDA and MSA answer
  Line ~398  Footer: phone and street address
  Footer     LinkedIn link: replace href="#" with your LinkedIn company page

If you don't have real data for a section yet (for example the 40% claim or the
testimonial), delete that block instead of publishing placeholders. The comments
in the file show where each block starts and ends.

Founder photo: save a square photo as assets/img/founder.jpg, then change
"founder.svg" to "founder.jpg" on line ~298.

Also confirm before publishing:
  - Every engineer behind the CCIE and JNCIE badges is currently certified, and your use
    of the badges follows Cisco's and Juniper's certification logo guidelines.
  - The white-label commitments (NDA, non-solicitation, MFA access) match your contracts.


STEP 2 — MAKE SURE YOUR PLAN CAN HOST FILES
-------------------------------------------
nexoguard.net is currently built with Hostinger Website Builder. The Website Builder
cannot import HTML files, so to use this code the domain must run on a Hostinger
WEB HOSTING plan (for example Premium or Business), not Website Builder alone.

  - In hPanel, open Websites and check what nexoguard.net is running on.
  - If it's on Website Builder, ask Hostinger support (live chat in hPanel):
    "Please help me switch nexoguard.net from Website Builder to web hosting so I can
     upload my own HTML files to public_html."
  - Keep the old Website Builder site until the new one is live and tested.


STEP 3 — UPLOAD
---------------
  1. In hPanel, open Websites > nexoguard.net > File Manager.
  2. Open the public_html folder.
  3. Delete the placeholder file (usually default.php), if present.
  4. Click Upload and choose nexoguard-site.zip.
  5. Right-click the zip > Extract. Extract into public_html itself.
  6. Check that index.html sits directly inside public_html, not inside a subfolder.
     If it landed in public_html/nexoguard-site/, move everything up one level.
  7. Delete the zip file.
  8. Visit https://nexoguard.net and check the page on your computer and phone.


STEP 4 — TEST THE CONTACT FORM
------------------------------
  1. In hPanel > Emails, make sure sales@nexoguard.com receives mail. Leads are sent
     there; change $to on line 11 of contact.php to use a different inbox.
  2. Hostinger only sends mail "from" an address on the website's own domain.
     contact.php uses noreply@nexoguard.net (line 12). Create that mailbox, or change
     it to an existing address on nexoguard.net.
  3. Submit a test request on the live site. You should see a green "Thanks" message,
     and the email should arrive in a few minutes. Check the spam folder too.


STAYING ON WEBSITE BUILDER INSTEAD?
-----------------------------------
If you'd rather keep the Website Builder, don't upload this code. Instead:
  - Upload the three badge images from assets/img/ with the builder's Image element.
  - Copy the text from index.html into the builder's sections, block by block
    (the review doc's section 5 maps each block).
  - Use the builder's own contact form; contact.php only works on web hosting.
