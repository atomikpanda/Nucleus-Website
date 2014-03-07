//Import Nucleus.framework
#import <Nucleus/Nucleus.h>
//Define static variable for access in later parts of your code.
static Nucleus *nucleus;

__attribute__((constructor))
static void initialize() {
	//Initialize nucleus
    nucleus = [[Nucleus alloc] init];
    //Enable debugging (optional)
    nucleus.debug = YES;
}