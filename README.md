# coachfinder
http://www.arnie.cc/projects/coachfinder/home

## Code refactoring - My ToDos:
- /src/Template/Layout/default.ctp --> Script/CSS source should come from Content Delivery Network.
- Layout adjustment for Mobile/Tablet
- /src/Controller/SearchController.php --> move methods clubs() and coaches() in their respective controller (index-method) and delete SearchController
- Improve Session handlings --> has to be more centralized
- Change request method POST to GET when retrieving data (search for coaches und club positions)
