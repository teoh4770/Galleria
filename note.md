Your users should be able to:

- [] View the optimal layout for the app depending on their device's screen size
- [] See hover states for all interactive elements on the page
- [] Navigate the slideshow and view each painting in a lightbox

```css
 /*
**bold**
display,
heading,
subhead2,
link,
body

**regular
subhead1**
*/

.libre-baskerville-regular {
    font-family: "Libre Baskerville", serif;
    font-weight: 400;
    font-style: normal;
}

.libre-baskerville-bold {
    font-family: "Libre Baskerville", serif;
    font-weight: 700;
    font-style: normal;
}

.libre-baskerville-regular-italic {
    font-family: "Libre Baskerville", serif;
    font-weight: 400;
    font-style: italic;
}

```

=== End of CSS ===


=== Routes ===

home/index: `/`  (a page that show the link to gallery page, contain the list of images)
gallery page: `/images`
detail page: `/images/{id}`

=== End of Routes

Logs:

- Gather all the styling from Figma
- Setup index.php
- Setup style.css and app.js files in public
- Setup the base of style.css (root, reset, general styling and some utility)
- Setup the folders of php, controllers, views, Router, routes
- Setup public folder that contains the base php, CSS and JS files
- [X] Complete the navbar structure and styling
- [X] Import json data to homepage
- [X] Setup the basic html structure for gallery page
- [X] Setup the css for gallery page with placeholder images
- [X] Mask the image with extra layer of gradient, to make the text more prominent
- [X] Setup the masonry pattern for mobile, tablet and desktop view
- [X] Show the images only after the page is finished loaded
- Note: ignore the aspect ratio and jumping issue first
- [X] Create the route for visiting specific page 
- [X] Create the controller for detail page
- [X] Create the html structure for detail page (mobile)
- [X] Create the css for detail page (mobile)
- [X] Render the detailed data of the picture dynamically
- [X] Fixed the extra margin on the horizontal side of the body
- [X] Create the css for detail page (tablet)
- [X] Create the functionality of image control (server-side method)
  - I change the lightbox navigation button to 2 links,
  - which will link to the previous and next image data
  - from json file
  - based on the current id we have.
- [X] Listen to key event (left and right key) to change the current image
  - if click on left stroke, then previous image button is clicked.
  - if click on right stroke, then next image button is clicked.
- [X] Update the homepage individual link with its respective page
- [X] Update the icon image of the lightbox navigation button
- [X] `start slideshow` button
  - [X] Click on `start slideshow` button will bring user to the slideshow
  - [X] Click on `stop slideshow` button will bring user back to the gallery page
- [X] Slideshow in desktop view 
- [X] `View image` button
  - [X] Click on `view image` button will open the modal
  - [X] Click on the close button will close the modal
- [X] Bar indicator
- [X] Refactor the markup (see how tailwind writes their markup with tailwind ui)
  - index.view.php
  - 404.php
  - images/index.view.php
  - images/show.view.php
- [X] Show the content once images in /image route have loaded
- [X] Convert CSS to TailwindCSS for better clarity and cleaner markup
- [] Create note for solution like dialog and indicator
- [X] Find hosting (digital oceon or heroku)