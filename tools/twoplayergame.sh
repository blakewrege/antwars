#!/usr/bin/env sh
./playgame.py -So --player_seed 42 --end_wait=0.25 --verbose --log_dir game_logs --turns 1000 --map_file maps/maze/maze_p02_38.map "$@" \
	"python sample_bots/python/HunterBot.py" \
	"php testarena/MyBot.php"  |
java -jar visualizer.jar
